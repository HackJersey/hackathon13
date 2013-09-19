package code.lib

import net.liftweb.json.JInt
import scala.collection.mutable.ListBuffer
import com.mongodb.casbah.Imports._

class DailyAccidentCollection(mongoDb: MongoDB) {
    var daily_accidents = mongoDb("daily_accidents")

    def dailyAccidentsForYear(year: Int): List[JInt] = {
        var accidents = daily_accidents.findOne(MongoDBObject("year" -> year))
        if (accidents != None) {
            var ret = new ListBuffer[JInt]
            accidents.get("accidents").asInstanceOf[BasicDBList].foreach(accident_num => {
                ret += JInt(accident_num.asInstanceOf[Int])
            })

            ret.toList
        }
        else
            List()
    }
}
