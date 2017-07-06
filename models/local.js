var mongoose = require("mongoose");

var localSchema = new mongoose.Schema({
  name: { type: String, required: true},
  id_name: String,
  confirmed: Boolean,
  image: String,
  image2: String,
  dates: [
    {
      day: Date,
      hour: String,
      personal: String
    }
  ],
  location:{
    lat: String,
    long: String,
    city: String,
    state: String,
    country: String,
    mapLink: String
  }
});
module.exports = mongoose.model("Local", localSchema);
