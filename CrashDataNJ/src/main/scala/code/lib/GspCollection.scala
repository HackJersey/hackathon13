package code.lib

import com.mongodb.casbah.Imports._

class GspCollection(mongoDb: MongoDB) {
    var gsp = mongoDb("gsp")

    def mileMarkersForYear(year: Int): BasicDBList = {
        gsp.findOne(MongoDBObject("year" -> year)).get("miles").asInstanceOf[BasicDBList]
    }
}

