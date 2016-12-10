'use strict';

module.exports = function(Mis) {

	Mis.dump = function(cb) {
	var app = require('../../server/server');

    var ds = Mis.dataSource;   
    
    ds.connector.query('SELECT year(date_added) as "year", month(date_added) as "month", (WEEK(date_added, 5) - WEEK(DATE_SUB(date_added, INTERVAL DAYOFMONTH(date_added) - 1 DAY), 5) + 1) week, "3" as rating, "1" as franchiese_id , "3" as unit_id, date_added as date_time from date where DATE_FORMAT(NOW(),"%m-%d-%Y") = DATE_FORMAT(date_added,"%m-%d-%Y")', function (err, employee) {
	 if (err) {
            console.error(err);
          } else {
            cb(err, employee);
           // console.log(employee);
          }
          //cb(err, employee);
          for (var i = 0; i < employee.length; i++) { 
 	   			//console.log(JSON.stringify(employee[i]));
				var artistRatng = app.models.artistRatng;
				//console.log(artistRatng);
				//console.log(app.models);
				artistRatng.create(employee[i]);
			}

   });
}

 Mis.remoteMethod(
     'dump',
      {
        http: {verb: 'get'},
        escription: 'Find 4 random instances of the model from the data source',
	    returns: {arg: 'data', type: ['Category'], root: true},
      }
);


 Mis.updatedata = function(data, cb) {
  
  var app = require('../../server/server');

    var error = {};
    var success = {}; 

    if(data.hasOwnProperty("appointment_id")) {
      
      var appointment_id = data['appointment_id'];

      var appointmentSummary = app.models.appointmentSummary;

      appointmentSummary.find({"where":{"appointment_id":appointment_id}}, function(err, result){

              if(err) {
  
                cb(null, err);
              
              } else {

                  if(result.length == 0 ) {
                
                    error['message'] = "appointment_id does not exist";
                    cb(null, error);
                
                   } else {
                        
                      appointmentSummary.updateAll({ 'appointment_id': appointment_id }, data, function(err, resultset) {

                          if(err) {
                            cb(null, err);
                          } else {
                            success['message'] = 'Updated successfully';
                            cb(null, success);
                          }

                        });
                   }
              }
        });
    } else {
      
        error['message'] = "appointmmnet field is required";
        cb(null, error);      
    }

  /*  var ds = Mis.dataSource;  

        var appointmentSummary = app.models.appointmentSummary;

       appointmentSummary.find({"where":{"appointment_id":appointment_id}}, function(err, data){

              if(err) {
                cb(null, err);
              } else {

              }

        });

*/      
    }
     
    Mis.remoteMethod(
        'updatedata', 
        {
          http: { verb: 'post' },
          description: 'update appontment summary data',
          accepts: {arg: 'data', type: 'Object', required: true},
          returns: { arg: 'data', type: ['data'], root: true }
        }
    );










 Mis.byCategory = function (category, cb) {

        var ds = Mis.dataSource;
        var sql = "SELECT * FROM products WHERE category=?";
        console.log(category);

    };

    Mis.remoteMethod(
        'byCategory',
        {
            http: { verb: 'get' },
            description: 'Get list of products by category',
            accepts: { arg: 'category', type: 'string' },
            returns: { arg: 'data', type: ['Product'], root: true }
        }
    );





};
