const ROOT = 'http://localhost/lifelink/'

async function postData(endPoint, body) {

    return await fetch(getUrl(endPoint), {
        method: 'post',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        },
        body: JSON.stringify(body)
    })
    .then(res => res.json())
    .catch(e => console.error(e))
}

function getUrl(endPoint) {
    return `${ROOT}${endPoint}`
}