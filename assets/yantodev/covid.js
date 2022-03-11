/**
 * @Author : yantodev
 * mailto: ekocahyanto007@gmail.com
 * link : http://yantodev.github.io/
 */
function getCovidData() {
    console.log("covid")
    const url = "https://data.covid19.go.id/public/api/prov.json";
    const result = [];
    fetch(url,
        { mode: 'no-cors', }
    )
    .then (response => {
        result.push(response);
        console.log(response)
    })
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