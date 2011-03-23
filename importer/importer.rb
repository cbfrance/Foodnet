#!/Users/chris/.rvm/rubies/ruby-1.8.7-p302/bin/ruby
require 'rubygems'
require 'nokogiri'

doc = Nokogiri::XML.parse(File.read('./foodnet.nolinks.kml'));
re= /(http:\/\/.*)\&lt/
linked= doc.to_s.gsub!( re, "&lt;a href=&#x27;&#x27;&gt;Foodnet Page&lt;/a&gt;&lt;/td&gt")
