var express = require('express');
var path = require('path');
var favicon = require('serve-favicon');
var logger = require('morgan');
var cookieParser = require('cookie-parser');
var bodyParser = require('body-parser');
var mongoose = require('mongoose');
var fs = require('fs');
var nodemailer = require('nodemailer');

var Booking = require("./models/booking");
var BeginReg = require("./models/email");
var Email = require("./models/email");
var Local = require("./models/local");
var Suggestion = require("./models/suggestion");
var User = require("./models/user");
var Personal = require("./models/personal");

var app = express();


// APP CONFIG
app.set('views', path.join(__dirname, 'views'));
app.set('view engine', 'ejs');

app.use(favicon(__dirname + '/public/img/favicon.png'));
app.use(logger('dev'));
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({
  extended: true
}));
app.use(cookieParser());
app.use(express.static(path.join(__dirname, 'public')));

var env = process.env.NODE_ENV || 'development';
app.locals.ENV = env;
app.locals.ENV_DEVELOPMENT = env == 'development';


// mongoose.connect("mongodb://localhost/alltleta");
mongoose.connect("mongodb://alefmon:alltleta@ds151820.mlab.com:51820/alltleta");

// create reusable transporter object using the default SMTP transport
var smtpTransport = require('nodemailer-smtp-transport');
let transporter = nodemailer.createTransport(smtpTransport({
   host: 'smtp.zoho.com',
   port: 587,
   secure: false,
   auth: {
       user: 'treino@alltleta.com',
       pass: 'Fernando1@'
   }
}));

// ROUTES

app.get("/", function(req, res) {
  Local.find({confirmed: true}, function(err, locals) {
    if(err){
      console.log(err);
    }
    else{
      res.render("index", {locals: locals.sort()});
    }
  });
});

app.get("/download", function(req, res) {
  res.render("download");
});

app.post("/download", function(req, res) {
  var email = req.body.email;
  var newEmail = { email: email}
  Email.create(newEmail, function(err, newlyCreated){
    if(err){
        console.log(newEmail[email]);
    } else {
        // ALERTA !
        console.log(newlyCreated);
        // Send email
        var htmlstream = fs.createReadStream('./emails/download.html');
        let mailOptions = {
            from: '"Alltleta" <treino@alltleta.com>', // sender address
            to: email, // list of receivers
            subject: 'App da Alltleta', // Subject line
            html: htmlstream, // plain text body
        };

        // send mail with defined transport object
        transporter.sendMail(mailOptions, (error, info) => {
            if (error) {
                return console.log(error);
            }
            console.log('Message %s sent: %s', info.messageId, info.response);
        });
        res.redirect("/download");
    }
  });
});

app.get("/treinos", function(req, res) {
  Local.find({}, function(err, locals) {
    if(err){
      console.log(err);
    }
    else{
      res.render("suggestion", {locals: locals.sort()});
    }
  });});

app.get("/conheca-app", function(req, res) {
  res.render("about");
});

app.get("/blog", function(req, res) {
  res.render("blog");
});

app.get("/contato", function(req, res) {
  res.render("contact");
});

app.post("/contato", function(req, res) {
  var name = req.body.name,
      phone = req.body.phone,
      email = req.body.email,
      text= req.body.text;
  // Enviar email automático !
  // Send email
  let mailOptions = {
      from: '"Alltleta" <treino@alltleta.com>', // sender address
      to: email, // list of receivers
      subject: 'Contato - Alltleta', // Subject line
      text: 'Obrigado por falar com a Alltleta! Em breve nossa equipe entrará em contato com você. \n\nAtenciosamente,\n\nEquipe da Alltleta.', // plain text body
  };

  // send mail with defined transport object
  transporter.sendMail(mailOptions, (error, info) => {
      if (error) {
          return console.log(error);
      }
      console.log('Message %s sent: %s', info.messageId, info.response);
  });
});

app.get("/agendar-aula", function(req, res) {
  Local.find({confirmed: true}, function(err, locals) {
    if(err){
      console.log(err);
    }
    else{
      res.render("agendar", {locals: locals.sort()});
    }
  });
});

app.get("/trabalhe-conosco", function(req, res) {
  res.render("trabalheConosco");
});

app.post("/trabalhe-conosco", function(req, res) {
  var name = req.body.name,
      phone = req.body.phone,
      email = req.body.email,
      bookTime = Date.now();
  var newRegistration = {
    name: name,
    phone: phone,
    email: email,
    registrationTime: bookTime
  };
  Personal.create(newRegistration, function(err, newlyCreated){
    if(err){
        console.log(err);
    } else {
        // ALERTA !
        console.log(newlyCreated);
        // Send email
        let mailOptions = {
            from: '"Alltleta" <treino@alltleta.com>', // sender address
            to: email, // list of receivers
            subject: 'Cadastro Personal da Alltleta', // Subject line
            text: 'Parabéns! Você foi adicionado ao nosso banco de dados de profissionais da Alltleta. Em breve nossa equipe entrará em contato por email ou telefone. Obrigado. \nAtenciosamente,\nEquipe da Alltleta.', // plain text body
        };

        // send mail with defined transport object
        transporter.sendMail(mailOptions, (error, info) => {
            if (error) {
                return console.log(error);
            }
            console.log('Message %s sent: %s', info.messageId, info.response);
        });
        // Redirect
        res.redirect("/trabalhe-conosco");
    }
  });
});

app.get("/sucesso", function(req, res) {
  res.render("sucesso");
});


//EMAIL form index page
app.post("/agendar", function (req, res) {
  var email = req.body.email;
  var newEmail = { email: email}
  Email.create(newEmail, function(err, newlyCreated){
    if(err){
        console.log(newEmail[email]);
    } else {
        console.log(newlyCreated);
        res.redirect("/agendar-aula");
    }
  });
});
// Book class
app.post("/agendar-aula", function (req, res) {
  var name = req.body.name,
      phone = req.body.phone,
      email = req.body.email,
      date = req.body.date,
      time = req.body.time,
      local = req.body.local,
      quant = req.body.quant,
      bookTime = Date.now();

  var newRegistration = {
    name: name,
    phone: phone,
    email: email,
    date: date,
    time: time,
    quant: quant,
    local: local,
    registrationTime: bookTime
  };
  Booking.create(newRegistration, function(err, newlyCreated){
    if(err){
        console.log(err);
    } else {
        // ALERTA !
        console.log(newlyCreated);
        res.render("pagamento", {data: newRegistration});
        // Send email
        let mailOptions = {
            from: '"Alltleta" <treino@alltleta.com>', // sender address
            to: email, // list of receivers
            subject: 'Confirmação - Treino Funcional', // Subject line
            text: 'Em breve nossa equipe entrará em contato por email ou telefone. Obrigado. \nAtenciosamente,\nEquipe da Alltleta.', // plain text body
        };

        // send mail with defined transport object
        transporter.sendMail(mailOptions, (error, info) => {
            if (error) {
                return console.log(error);
            }
            console.log('Message %s sent: %s', info.messageId, info.response);
        });
    }
  });
});


app.post("/suggestion", function (req, res) {
  var name = req.body.name,
      phone = req.body.phone,
      email = req.body.email,
      date = req.body.date,
      time = req.body.time,
      local = req.body.local,
      quant = req.body.quant,
      bookTime = Date.now();

  var newRegistration = {
    name: name,
    phone: phone,
    email: email,
    date: date,
    time: time,
    quant: quant,
    local: local,
    registrationTime: bookTime
  };
  Suggestion.create(newRegistration, function(err, newlyCreated){
    if(err){
        console.log(err);
    } else {
        // ALERTA !
        console.log(newlyCreated);
        // Send email
        let mailOptions = {
            from: '"Alltleta" <treino@alltleta.com>', // sender address
            to: email, // list of receivers
            subject: 'Cadastro Personal da Alltleta', // Subject line
            text: 'Obrigado. \nAtenciosamente,\nEquipe da Alltleta.', // plain text body
        };

        // send mail with defined transport object
        transporter.sendMail(mailOptions, (error, info) => {
            if (error) {
                return console.log(error);
            }
            console.log('Message %s sent: %s', info.messageId, info.response);
        });
        res.render("suggestion", {data: newRegistration});
    }
  });
});


// app.listen(3000, function() {
//   console.log("Alltleta server is listening! ");
// });

app.listen(process.env.PORT, process.env.IP, function(){
   console.log("The Alltleta Server Has Started!");
});

/// catch 404 and forward to error handler
app.use(function(req, res, next) {
    var err = new Error('Not Found');
    err.status = 404;
    next(err);
});

/// error handlers

// development error handler
// will print stacktrace

if (app.get('env') === 'development') {
    app.use(function(err, req, res, next) {
        res.status(err.status || 500);
        res.render('error', {
            message: err.message,
            error: err,
            title: 'error'
        });
    });
}

// production error handler
// no stacktraces leaked to user
app.use(function(err, req, res, next) {
    res.status(err.status || 500);
    res.render('error', {
        message: err.message,
        error: {},
        title: 'error'
    });
});


module.exports = app;
//
// Local.create({
//   name: "Praça Lagoa Seca do Belvedere",
//   id_name: "lagoaSeca",
//   confirmed: false,
//   image: "img/bh/lagoaSeca.png",
//   dates: [{
//     day: new Date("April 11, 2017"),
//     hour: 8,
//     personal: ""
//   },
//   {
//     day: new Date("April 11, 2017"),
//     hour: 9,
//     personal: ""
//   }],
//   location:{
//     lat: "-19.9729378",
//     long: "-43.942759",
//     city: "Belo Horizonte",
//     state: "MG",
//     country: "BR",
//     mapLink: "https://www.google.com.br/maps/place/Lagoa+Seca,+Belvedere/@-19.9729378,-43.9449477,17z/data=!3m1!4b1!4m5!3m4!1s0xa697f7d17ad673:0x1f1fb1e63452b8a0!8m2!3d-19.9729378!4d-43.942759?hl=en"
//   }
// });
