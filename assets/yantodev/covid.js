/**
 * @Author : yantodev
 * mailto: ekocahyanto007@gmail.com
 * link : http://yantodev.github.io/
 */
   
// function getCovidData() {
//      $.ajax({
//         type:'GET',
//          url: 'https://api.covid19api.com/',
//          dataType: 'application/json',
//         beforeSend: function(e) {
//                     if (e && e.overrideMimeType) {
//                         e.overrideMimeType("application/json;charset=UTF-8");
//                     }
//                 },
//          success: function (response) {
//             console.log(response.json());
//         },
//         error: function(xhr, ajaxOptions, thrownError) { 
//             swal.fire(ajaxOptions, xhr.responseText ,"error"); 
//         }
//     })
// }
async function getCovidData(url = '') {
  // Default options are marked with *
  const response = await fetch(url, {
    method: 'GET', // *GET, POST, PUT, DELETE, etc.
    mode: 'no-cors', // no-cors, *cors, same-origin
    cache: 'no-cache', // *default, no-cache, reload, force-cache, only-if-cached
    headers: {
        'Content-Type': 'application/json',
        'Access-Control-Allow-Origin' : '*'
      // 'Content-Type': 'application/x-www-form-urlencoded',
    },
    redirect: 'follow', // manual, *follow, error
    referrerPolicy: 'no-referrer'
  });
  return response; // parses JSON response into native JavaScript objects
}
getCovidData('https://api.covid19api.com/')
  .then(response => {
    console.log(response); // JSON data parsed by `data.json()` call
  });