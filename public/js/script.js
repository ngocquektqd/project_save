const submit_btn = document.getElementById('submit');
// get_user_detail();
getPost();
function getPost(){
        console.log('chao Truong');
    fetch('http://localhost/Posts/indexaction')
        .then(res => res.json())
        .then(data => {
            let tbody = document.getElementById('allpost');
            let tr = '';
            data.forEach(item => {
            tr+=`
            <tr>
                <td>${item.title}</td>
                <td>${item.excerpt}</td>
                <td>${item.image}</td>

            </tr>
            `
            })
                tbody.innerHTML = tr
            // console.log(data);
            // const get_post = data.list_user[Math.floor(Math.random() * data.list_user.length)];
            // console.log(get_user);
            //
            //     title.innerText = get_post.title;
            //     excerpt.innerText = get_post.excerpt;
            //     image.innerText = get_post.image;

        })
        .catch(error => console.log(error));

}