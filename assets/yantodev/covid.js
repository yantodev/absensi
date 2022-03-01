/**
 * @Author : yantodev
 * mailto: ekocahyanto007@gmail.com
 * link : http://yantodev.github.io/
 */
   
function getCovidData() {
    fetch('https://data.covid19.go.id/public/api/prov.json', {
        method : 'GET',
        mode: 'no-cors'
    })
    .then((res) => res)
    .then((data) => console.log(data))
    .catch((error) => console.log(error))
}
// async function getCovidData(url = '') {
//   // Default options are marked with *
//   const response = await fetch(url, {
//     method: 'GET', // *GET, POST, PUT, DELETE, etc.
//     mode: 'same-origin', // no-cors, *cors, same-origin
//     cache: 'no-cache', // *default, no-cache, reload, force-cache, only-if-cached
//     credentials: "same-origin",
//     headers: {
//         'Content-Type': 'application/json',
//         "Accept": "application/json"
//       // 'Content-Type': 'application/x-www-form-urlencoded',
//     },
//     redirect: 'follow', // manual, *follow, error
//     referrerPolicy: 'no-referrer'
//   });
//   return response; // parses JSON response into native JavaScript objects
// }
// getCovidData('https://data.covid19.go.id/public/api/prov.json')
//   .then(data => {
//     console.log(data); // JSON data parsed by `data.json()` call
//   });