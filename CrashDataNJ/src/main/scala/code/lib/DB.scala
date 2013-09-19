package code.lib

import com.mongodb.casbah.Imports._

class DB {
    var uri = System.getenv("NJDB_URL")
    val mongoUri = new MongoURI(new com.mongodb.MongoURI(uri))
    val mongoDb = mongoUri.connectDB

    if (mongoUri.username != null && mongoUri.password != null)
        mongoDb.authenticate(mongoUri.username, new String(mongoUri.password))

    def accidentCollection: AccidentCollection = {
        new AccidentCollection(mongoDb)
    }

    def dailyAccidentCollection: DailyAccidentCollection = {
        new DailyAccidentCollection(mongoDb)
    }

    def driverCollection: DriverCollection = {
        new DriverCollection(mongoDb)
    }

    def gspCollection: GspCollection = {
        new GspCollection(mongoDb)
    }
}
