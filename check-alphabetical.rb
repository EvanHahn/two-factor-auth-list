require 'json'

file_data = File.open('data.json', 'rb').read
json = JSON.parse file_data
services = json['services']

names = services.map { |service| service['name'].downcase }
sorted = names.sort

sorted.each_with_index do |name, correct_index|
  actual_index = names.find_index(name)
  if actual_index != correct_index
    puts "#{name} is in the wrong place"
  end
end
