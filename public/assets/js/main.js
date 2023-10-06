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

const formTitle = document.getElementById("post-form-title");
const formCategory = document.getElementById("post-form-category");
const formType = document.getElementById("post-form-type");
const formSubmit = document.getElementById("post-form-btn");
const userId = document.getElementById("user-id");

function newPostEditing() {
    if (formCategory.value == 0) {
        formSubmit.disabled = true;
        return;
    }

    formSubmit.disabled = false;
}

async function addNewPost() {
    const quillContent = quill.root.innerHTML;
    const body = {
        title: formTitle.value,
        description: quillContent,
        post_categories_id: formCategory.value,
        post_types_id: formType.value,
        users_id: userId.value,
    };
    const res = await postData("/posts/add", body);
    if (!res.success) {
        alert(`Something went wrong\n${res.msg}`);
        return;
    }

    alert("Post added");
    window.location.reload()
}

formSubmit.addEventListener("click", () => addNewPost());

// _____________________________kosala____________________________________

var imageInput = document.getElementById("imageInput");
var imagePreview = document.getElementById("imagePreview");

imageInput.addEventListener("change", function () {
    var file = imageInput.files[0];
    if (file) {
        if (isImageFile(file)) {
            displayImagePreview(file);
        } else {
            imageInput.value = "";
            alert("Only image files are allowed.");
        }
    }
});

function isImageFile(file) {
    return file.type.startsWith("image/");
}

function displayImagePreview(file) {
    var reader = new FileReader();
    reader.onload = function (e) {
        var img = document.createElement("img");
        img.src = e.target.result;
        img.classList.add("img-thumbnail");
        imagePreview.innerHTML = "";
        imagePreview.appendChild(img);
        document.getElementById("add_post_img").classList.add("d-none");
        document.getElementById("remove_post_img").classList.remove("d-none");
    };
    reader.readAsDataURL(file);
}

function remove_post_img() {
    document.getElementById("imageInput").value = "";
    document.getElementById("imagePreview").innerHTML = "";
    document.getElementById("add_post_img").classList.remove("d-none");
    document.getElementById("remove_post_img").classList.add("d-none");
}

function closeEdit() {
    const update_icon = document.getElementById("update_icon1");
    const edit_icn = document.getElementById("edit_icn1");
    const inputElement = document.getElementById("mobile");

    update_icon.classList.add("d-none");
    edit_icn.classList.remove("d-none");
    inputElement.addAttribute("readonly");
}

const btnMobileUpdate = document.getElementById("update_icon1")
const userMobile = document.getElementById("mobile")
btnMobileUpdate.addEventListener('click', async () => {
    const res = await postData("/users/update", { id: userId.value, mobile: userMobile.value })
    if (!res.success) {
        alert("Something went wrong!")
        return
    }
    alert("Details updated!")
    userMobile.value = res.mobile

})

const btnNameUpdate = document.getElementById('update-name-btn')
const btnBioUpdate = document.getElementById('update-bio-btn')
const userFname = document.getElementById('user-fname')
const userLname = document.getElementById('user-lname')
const userBio = document.getElementById('user-bio')
const userBioInput = document.getElementById('user-bio-input')

btnNameUpdate.addEventListener('click', async () => {
    const res = await postData("/users/update", { id: userId.value, fname: userFname.value, lname: userLname.value })
    if (!res.success) {
        alert("Something went wrong!")
        return
    }
    alert("Details updated!")
    userFname.value = res.fname
    userLname.value = res.lname
    document.querySelector('.user-name').innerText = `${res.fname} ${res.lname}`

    name_edit1()
})

btnBioUpdate.addEventListener('click', async () => {
    const res = await postData("/users/update", { id: userId.value, bio: userBioInput.value})
    if (!res.success) {
        alert("Something went wrong!")
        return
    }
    alert("Details updated!")
    userBio.innerHTML = res.bio
    userBioInput.value = res.bio

    name_edit2()
})