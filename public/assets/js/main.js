const ROOT = "http://localhost/lifelink";

async function postData(endPoint, body) {
    return await fetch(getUrl(endPoint), {
        method: "post",
        headers: {
            "Content-Type": "application/json",
            Accept: "application/json",
        },
        body: JSON.stringify(body),
    })
        .then((res) => res.json())
        .catch((e) => console.error(e));
}

function getUrl(endPoint) {
    return `${ROOT}${endPoint}`;
}

// __________________________kosala_______________________________________

function open_search() {
    const mob_search = document.getElementById("mob_search");

    mob_search.classList.toggle("d-none");
}

function open_edit1() {
    const update_icon = document.getElementById("update_icon1");
    const edit_icn = document.getElementById("edit_icn1");
    const inputElement = document.getElementById("mobile");

    update_icon.classList.remove("d-none");
    edit_icn.classList.add("d-none");
    inputElement.removeAttribute("readonly");
    inputElement.focus();
}
function name_edit1() {
    const name_edit = document.getElementById("name_edit");
    name_edit.classList.toggle("d-none");
}
function open_log_out() {
    const log_out_div = document.getElementById("log_out_div");
    log_out_div.classList.toggle("d-none");
}
function open_chat(id) {
    const chat_div = document.getElementById(`chat_div-${id}`);
    chat_div.classList.toggle("d-none");
}

function see_more_post(id) {
    document.getElementById(`see_all_post-${id}`).classList.toggle("disc3");
    document.getElementById(`see_all_post1-${id}`).classList.toggle("d-none");
}

function name_edit2() {
    const bio_edit = document.getElementById("bio_edit");
    bio_edit.classList.toggle("d-none");
}

const quill = new Quill("#editor", {
    placeholder: "Start a post...",
    theme: "snow", // or 'bubble'
});

const formContent = document.getElementById('post-form-content')
const formCategory = document.getElementById('post-form-category')
const formType = document.getElementById('post-form-type')
const formSubmit = document.getElementById('post-form-btn')
const userId = document.getElementById('user-id')

function newPostEditing() {

    if (formCategory.value == 0) {
        formSubmit.disabled = true
        return
    }

    formSubmit.disabled = false
}

async function addNewPost() {
    const quillContent = quill.root.innerHTML;
    const body = { description: quillContent, post_categories_id: formCategory.value, post_types_id: formType.value, users_id: userId.value }
    const res = await postData("/posts/add", body)
    if (!res.success) {
        alert(`Something went wrong\n${res.msg}`)
        return
    }

    alert("Post added")
}

formSubmit.addEventListener('click', () => addNewPost())

