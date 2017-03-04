<?php

Route::any("/net/tridentsdk/plugins/{space}/{plugin}/maven-metadata.xml", function($space, $plugin){
	$pluginModel = \TridentSDK\Plugin::findBySpace($space, $plugin);

	if(is_null($pluginModel)){
		return response(null, 404);
	}

	$metadata = new SimpleXMLElement('<metadata/>');

	$metadata->addChild("groupId", $space);
	$metadata->addChild("artifactId", $plugin);

	$versioning = $metadata->addChild("versioning");
	$versions = $versioning->addChild("versions");
	$latestVersionName = null;
	$latestVersionDate = 0;
	foreach($pluginModel->versions() as $versionModel){
		$versions->addChild("version", $versionModel->version);

		if($versionModel->created_at->timestamp > $latestVersionDate){
			$latestVersionDate = $versionModel->created_at->timestamp;
			$latestVersionName = $versionModel->version;
		}
	}

	$versioning->addChild("latest", $latestVersionName);
	$versioning->addChild("lastUpdated", $latestVersionDate);

	return response($metadata->asXML(), 200, array("Content-Type" => "application/xml"));
});

CONST MAVEN_PROJECT_DEF = "<project xmlns=\"http://maven.apache.org/POM/4.0.0\" xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\" xsi:schemaLocation=\"http://maven.apache.org/POM/4.0.0 http://maven.apache.org/xsd/maven-4.0.0.xsd\"/>";

Route::any("/net/tridentsdk/plugins/{space}/{plugin}/{version}/{file}", function($space, $plugin, $version, $file){
	$pluginModel = \TridentSDK\Plugin::findBySpace($space, $plugin);

	if(is_null($pluginModel)){
		return response(null, 404);
	}

	$versionModel = $pluginModel->version($version);

	if(is_null($versionModel)){
		return response(null, 404);
	}

	if(ends_with($file, ".pom") || ends_with($file, ".pom.sha1") || ends_with($file, ".pom.md5")){
		$metadata = new SimpleXMLElement(MAVEN_PROJECT_DEF);

		$metadata->addChild("modelVersion", "4.0.0");
		$metadata->addChild("groupId", "net.tridentsdk.plugins.".$space);
		$metadata->addChild("artifactId", $plugin);
		$metadata->addChild("version", $version);

		$dependencyModels = $versionModel->dependencies();

		if(count($dependencyModels) > 0){
			$dependencies = $metadata->addChild("dependencies");
			foreach($dependencyModels as $dependencyModel){
				$dependency = $dependencies->addChild("dependency");
				$dependency->addChild("groupId", "net.tridentsdk.plugins.".$dependencyModel->dependency_space);
				$dependency->addChild("artifactId", $dependencyModel->dependency_name);

				// TODO Change to maven version once semantic versioning is enforced
				$dependency->addChild("version", $dependencyModel->dependency_version);

				$dependency->addChild("scope", "provided");
			}
		}

		if(ends_with($file, ".pom")){
			return response($metadata->asXML(), 200, array("Content-Type" => "application/xml"));
		}elseif(ends_with($file, ".pom.sha1")){
			return response(sha1($metadata->asXML()), 200, array("Content-Type" => "application/octet-stream"));
		}elseif(ends_with($file, ".pom.md5")){
			return response(md5($metadata->asXML()), 200, array("Content-Type" => "application/octet-stream"));
		}
	}

	if(ends_with($file, ".jar") || ends_with($file, ".jar.sha1") || ends_with($file, ".jar.md5")){

		if(ends_with($file, ".jar")){
			return response()->download("empty-jar.jar", $file, array("Content-Type" => "application/java-archive"));
		}elseif(ends_with($file, ".jar.sha1")){
			return response(sha1_file("empty-jar.jar"), 200, array("Content-Type" => "application/octet-stream"));
		}elseif(ends_with($file, ".jar.md5")){
			return response(md5_file("empty-jar.jar"), 200, array("Content-Type" => "application/octet-stream"));
		}
	}

	return response(null, 404);
});
