var mongoose = require('mongoose');

var personalSchema = new mongoose.Schema({
  name: String,
  phone: String,
  email: String,
  registrationTime: Date
});
module.exports = mongoose.model("Personal", personalSchema);
