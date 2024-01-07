// function getNewDate(callback) {
//     setTimeout(function () {
//     callback(new Date());
//     }, 4000);
//     }
//     function getPayload(payload) {
//     console.log(`The date is: ${payload}`);
//     }
// getNewDate(getPayload);
    

function getNewDate(callback) {
    setTimeout(function () {
    callback(new Date());
    }, 4000);
    }
    
getNewDate(payload => console.log(`The date is: ${payload}`));

const myPromisify = (fn) => {
    return (...args) => {
      return new Promise((resolve, reject) => {
        function customCallback(err, ...results) {
          if (err) {
            return reject(err)
          }
          return resolve(results.length === 1 ? results[0] : results) 
         }
         args.push(customCallback)
         fn.call(this, ...args)
       })
    }
 }
 
const getSumAsync = (num1, num2, callback) => {

    if (!num1 || !num2) {
      return callback(new Error("Missing dependencies"), null);
    }
   
    const sum = num1 + num2;
    const message = `Sum is ${sum}`
    return callback(null, sum, message);
  }

const getSumPromise = myPromisify(getSumAsync)
   
getSumPromise(3, 3).then(res => console.log(res)) // [6, 'Sum is 6']
  
  