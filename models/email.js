var mongoose = require("mongoose");

var emailSchema = new mongoose.Schema({
  email: String,
  registrationTime: Date
});

module.exports = mongoose.model("Email", emailSchema);
