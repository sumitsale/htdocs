MyModel = Model.extend('MyModel');
 
MyModel.on('myEvent', function() {
  console.log('meep meep!');
});
 
MyExtendedModel = MyModel.extend('MyExtendedModel');
 
MyModel.emit('myEvent'); // nothing happens (no event listener)
 
// this is where `setup()` becomes handy
 
MyModel.setup = function() {
  var MyModel = this;
  // since setup is called for every extended model
  // the extended model will also have the event listener
  MyModel.on('myEvent', function() {
    MyModel.printModelName();
  });
}