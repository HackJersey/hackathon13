import com.typesafe.startscript.StartScriptPlugin

name := "NJ Accidentlytics"

scalaVersion := "2.9.1"

seq(webSettings: _*)

seq(StartScriptPlugin.startScriptForClassesSettings: _*)

resolvers += "Java.net Maven2 Repository" at "http://download.java.net/maven/2/"

resolvers += "Scala Tools Snapshots" at "http://scala-tools.org/repo-snapshots"

resolvers += "Typesafe Snapshots" at "http://repo.typesafe.com/typesafe/snapshots"

libraryDependencies ++= {
  val liftVersion = "2.4" // Put the current/latest lift version here
  Seq(
    "net.liftweb" %% "lift-webkit" % liftVersion % "compile->default",
    "org.eclipse.jetty" % "jetty-server" % "7.6.0.RC5" % "compile->default",
    "org.eclipse.jetty" % "jetty-servlet" % "7.6.0.RC5" % "compile->default"
  )
}

// Customize any further dependencies as desired
libraryDependencies ++= Seq(
  "org.eclipse.jetty" % "jetty-webapp" % "7.3.1.v20110307" % "container", // For Jetty 8  
  "ch.qos.logback" % "logback-classic" % "0.9.26",
  "javax.servlet" % "servlet-api" % "2.5" % "provided->default",
  "com.mongodb.casbah" %% "casbah" % "2.1.5-1",
  "net.liftweb" %% "lift-mongodb" % "2.4",
  "commons-lang" % "commons-lang" % "2.6",
  "org.apache.httpcomponents" % "httpclient" % "4.1.2",
  "org.apache.httpcomponents" % "httpmime" % "4.1.2",
  "commons-io" % "commons-io" % "2.3",
  "oauth.signpost" % "signpost-core" % "1.2",
  "oauth.signpost" % "signpost-commonshttp4" % "1.2"  
)

scalacOptions ++= Seq("-unchecked", "-deprecation")
