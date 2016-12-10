'use strict';

module.exports = function(Employee) {


Employee.random = function(cb) {
    var ds = Employee.dataSource;
    console.log(Employee.dataSource);      
    ds.connector.query('select * from Employee ORDER BY RAND() LIMIT 4', function (err, employee) {
	 if (err) {
            console.error(err);
          } else {
            console.log(employee);
          }
          cb(err, employee);
   });
}

 Employee.remoteMethod(
     'random',
      {
             http: {verb: 'get'},
             description: 'Find 4 random instances of the model from the data source',
	    returns: {arg: 'data', type: ['Category'], root: true},
        }
);
};
