package code.lib

import java.util.Calendar
import scala.collection.mutable.ListBuffer
import net.liftweb.json.JInt
import com.mongodb.casbah.Imports._

class AccidentCollection(mongoDb: MongoDB) {
    var accidents = mongoDb("accidents")

    def accidentsByDayForYear(year: Int): List[JInt] = {
        var accident_list = new ListBuffer[JInt]
        var max_month = if (year == 2012) 6 else 12
        for (month <- 1 to max_month) {
            var calendar = Calendar.getInstance();
            calendar.set(year, month - 1, 1);
            var month_days = calendar.getActualMaximum(Calendar.DAY_OF_MONTH);
            for (day <- 1 to month_days) {
                var num_accidents = accidents.count(MongoDBObject("month" -> month, "day" -> day, "year" -> year))
                accident_list += JInt(num_accidents)
            }
        }

        accident_list.toList
    }

    def numAccidentsInYear(year: Int): Int = {
        var num = accidents.count(MongoDBObject("year" -> year))
        num.asInstanceOf[Int]
    }

    def numFatalitiesInYear(year: Int): Int = {
        var q = MongoDBObject("year" -> year,
                              "killed" -> MongoDBObject("$gt" -> 0))
        var num_accidents = accidents.count(q)
        num_accidents.asInstanceOf[Int]
    }

    def numInjuriesInYear(year: Int): Int = {
        var q = ("injured" $gt 0) ++ MongoDBObject("killed" -> 0, "year" -> year)
        var num_accidents = accidents.count(q)
        num_accidents.asInstanceOf[Int]
    }
}
