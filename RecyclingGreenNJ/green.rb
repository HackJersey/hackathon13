require 'sinatra/base'
class GreenFootprint < Sinatra::Base
    get "/" do
	 text = IO.readlines("CountyPercentagesR.db")
	 text2 = IO.readlines("CountyAvgGrantsResident.db")
         erb :index, :locals => {:text => text , :text2 => text2 }
    end
    post "/graphs" do
        @dbname = params[file]
        @dbname2 = params[db]
        erb :graphs
    end
    get "/form" do
        erb :form
    end
end
