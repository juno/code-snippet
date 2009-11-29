require 'rubygems'
require 'mongo'
require 'mongo_record'

class Track < MongoRecord::Base
  collection_name :tracks
  fields :artist, :album, :song, :track
  def to_s
    "artist: #{artist}, album: #{album}, song: #@song, track: #{@track ? @track.to_i : nil}"
  end
end

host = ENV['MONGO_RUBY_DRIVER_HOST'] || 'localhost'
port = ENV['MONGO_RUBY_DRIVER_PORT'] || Mongo::Connection::DEFAULT_PORT
MongoRecord::Base.connection = Mongo::Connection.new(host,port).db('mongorecord-test')

t = Track.new(:artist => 'Level 42', :album => 'Standing In The Light', :song => 'Micro-Kid', :track => 1)
puts t.to_s
puts "save returned #{t.save}"

puts "Find"
Track.find(:all).each { |t| puts t.to_s }

