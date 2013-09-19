package code.lib

import net.liftweb._
import http._
import rest._
import json._
import JsonDSL._
import net.liftweb.mongodb.JObjectParser

object RestApi extends RestHelper {
    var db = new DB

    serve {
        case "accidents" :: year :: _ JsonGet _ => {
            var accidents = db.dailyAccidentCollection.dailyAccidentsForYear(year.toInt)
            var total = db.accidentCollection.numAccidentsInYear(year.toInt)
            var killed = db.accidentCollection.numFatalitiesInYear(year.toInt)
            var injured = db.accidentCollection.numInjuriesInYear(year.toInt)
            var total_drivers = db.driverCollection.numDriversInYear(year.toInt)
            var out_of_town = db.driverCollection.numOutOfStateDriversInYear(year.toInt)
            var male = db.driverCollection.numMaleDriversInYear(year.toInt)
            var _18to27 = db.driverCollection.driverAgeIntervalInYear(18, 27, year.toInt)
            var _28to37 = db.driverCollection.driverAgeIntervalInYear(28, 37, year.toInt)
            var _38to47 = db.driverCollection.driverAgeIntervalInYear(38, 47, year.toInt)
            var _48to57 = db.driverCollection.driverAgeIntervalInYear(47, 57, year.toInt)
            var _58andup = db.driverCollection.driverAgeIntervalInYear(58, 300, year.toInt)
            var gsp_markers = db.gspCollection.mileMarkersForYear(year.toInt)
            JsonResponse(JObject(List(JField("daily_accidents",JArray(accidents)),
                                      JField("total_accidents",JInt(total)),
                                      JField("fatal_accidents",JInt(killed)),
                                      JField("injured_accidents",JInt(injured)),
                                      JField("out_of_town",JInt(out_of_town)),
                                      JField("in_town", JInt(total_drivers - out_of_town)),
                                      JField("males", JInt(male)),
                                      JField("females", JInt(total_drivers - male)),
                                      JField("18to27", JInt(_18to27)),
                                      JField("28to37", JInt(_28to37)),
                                      JField("38to47", JInt(_38to47)),
                                      JField("48to57", JInt(_48to57)),
                                      JField("58andup", JInt(_58andup)),
                                      JField("gsp_markers", JObjectParser.serialize(gsp_markers)))))
        }
    }
}
