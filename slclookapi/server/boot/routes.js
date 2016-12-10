/*
module.exports = function(app) {
  // Install a "/ping" route that returns "pong"
  app.get('/ping', function(req, res) {
    res.send('pong');
  });
}
*/

module.exports = function(app) {
  var router = app.loopback.Router();
  router.get('/ping', function(req, res) {
   // res.send('pongaroo from custom');
   // res.send(JSON.stringify(app.dataSources.mysql));

 	var mysql = app.datasources.mysql;      
    mysql.connector.query('select * from employee ORDER BY RAND() LIMIT 4', function (err, employee) {
	 if (err) {
            res.send(err);
          } else {
            res.send(employee);
          }
   });
 

Artistratng.find(null, 
          function (err, Artistratng) {
		if (err) {
		            res.send(err);
		          } else {
		            res.send(Artistratng);
		          }
		});;

 });


  app.use(router);
}