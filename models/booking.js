var mongoose = require("mongoose");

var bookSchema = new mongoose.Schema({
  date: String,
  time: String,
  local: String,
  name: String,
  phone: String,
  email: String,
  registrationTime: Date
});

module.exports = mongoose.model("Booking", bookSchema);
