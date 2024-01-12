
document.addEventListener('DOMContentLoaded', function () {



    function showAddTagPopup() {
        Swal.fire({
            title: 'Add New Tag',
            html: `
                <form action="${urlRoot}/TagController/add" method="POST" id="tagForm">
                    <label for="tagInput">Tag Name:</label>
                    <input id="tagInput" class="swal2-input" type="text" name="name" placeholder="Enter tag name" required>
                    <p id="tagInputError" class="text-red-500 text-sm mt-2"></p>
                </form>
            `,
            showCancelButton: true,
            confirmButtonText: 'Add',
            cancelButtonText: 'Cancel',
            preConfirm: () => {
                const form = document.getElementById('tagForm');
                const formData = new FormData(form);
                const tagInputError = document.getElementById('tagInputError');

                if (!formData.get('name')) {
                    tagInputError.textContent = 'Tag name is required';
                    return false;
                } else {
                    tagInputError.textContent = '';
                }

                fetch(form.action, {
                    method: 'POST',
                    body: formData,
                })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error(`HTTP error! Status: ${response.status}`);
                        }
                        console.log(response);
                        return response.json();
                    })
                    .then(data => {
                        console.log(data);
                    })
                    .catch(error => {
                        console.error('Fetch error:', error);
                    });
            },
        });
    }

    document.getElementById('addTag').addEventListener('click', () => showAddTagPopup());

    //////////////////////////////edit /////////////////////////

    document.querySelectorAll('.update-btn').forEach(function (button) {
        button.addEventListener('click', function () {

            const tagId = button.getAttribute('data-tag-id');
            const tagName = button.getAttribute('data-tag-name');


            showEditTagPopup(tagId, tagName);
        });
    });






    function showEditTagPopup(tagId, tagName) {
        Swal.fire({
            title: 'Edit Tag',
            html: `
                <form id="editTagForm" action="${urlRoot}/TagController/edit" method="POST">
                    <label for="tagName">Tag Name:</label>
                    <input id="tagName" class="swal2-input" type="text" value="${tagName}" name="name" required>
                    <p id="tageditError" class="text-red-500 text-sm mt-2"></p>
                    <input type="hidden" name="tagId" value="${tagId}">
                </form>
            `,
            showCancelButton: true,
            confirmButtonText: 'Update',
            cancelButtonText: 'Cancel',
            preConfirm: () => {
                const form = document.getElementById('editTagForm');
                const formData = new FormData(form);
                const tageditError = document.getElementById('tageditError');

                if (!formData.get('name')) {
                    tageditError.textContent = 'Tag name is required';
                    return false;
                } else {
                    tageditError.textContent = '';
                }

                return fetch(form.action, {
                    method: 'POST',
                    body: formData,
                })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error(`HTTP error! Status: ${response.status}`);
                        }
                        return response.json();
                    })
                    .catch(error => {
                        console.error('Fetch error:', error);
                    });
            },
        }).then(result => {
            if (result.value && result.value.success) {
                console.log(result.value.data);

            }
        });
    }

    ////////////////////////////delete tag /////////////////////////////////

    document.querySelectorAll('.delete-btn').forEach(function (button) {
        button.addEventListener('click', function () {
            const tagId = button.getAttribute('data-id');
            showDeleteTagPopup(tagId);
        });
    });

    function showDeleteTagPopup(tagId) {
        Swal.fire({
            title: 'Delete Tag',
            text: 'Are you sure you want to delete this tag?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Delete',
            cancelButtonText: 'Cancel',
        }).then((result) => {
            if (result.isConfirmed) {

                deleteTag(tagId);
            }
        });
    }


    function deleteTag(tagId) {
        const url = `${urlRoot}/TagController/delete`;

        fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `tagId=${tagId}`,
        })
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! Status: ${response.status}`);
                }
                return response.json();
            })
            .then(data => {
                // Handle the response data or perform additional actions
                console.log(data);
            })
            .catch(error => {
                // Handle errors
                console.error('Fetch error:', error);
            });
    }



    /////////////////////////category/////////////////////////////// 



    function showAddCatPopup() {
        Swal.fire({
            title: 'Add New Categorie',
            html: `
                <form action="${urlRoot}/CategorieController/add" method="POST" id="catForm">
                    <label for="tagInput">Categorie Name:</label>
                    <input id="catInput" class="swal2-input" type="text" name="name" placeholder="Enter categorie name" required>
                    <p id="catInputError" class="text-red-500 text-sm mt-2"></p>
                </form>
            `,
            showCancelButton: true,
            confirmButtonText: 'Add',
            cancelButtonText: 'Cancel',
            preConfirm: () => {
                const form = document.getElementById('catForm');
                const formData = new FormData(form);
                const catInputError = document.getElementById('catInputError');

                if (!formData.get('name')) {
                    catInputError.textContent = 'categorie name is required';
                    return false;
                } else {
                    catInputError.textContent = '';
                }

                fetch(form.action, {
                    method: 'POST',
                    body: formData,
                })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error(`HTTP error! Status: ${response.status}`);
                        }
                        console.log(response);
                        return response.json();
                    })
                    .then(data => {
                        console.log(data);
                    })
                    .catch(error => {
                        console.error('Fetch error:', error);
                    });
            },
        });
    }

    document.getElementById('addCat').addEventListener('click', () => showAddCatPopup());

    //////////////////////////////edit /////////////////////////

    document.querySelectorAll('.update-btn-cat').forEach(function (button) {
        button.addEventListener('click', function () {

            const catId = button.getAttribute('data-cat-id');
            const catName = button.getAttribute('data-cat-name');


            showEditCatPopup(catId, catName);
        });
    });






    function showEditCatPopup(catId, catName) {
        Swal.fire({
            title: 'Edit Categorie',
            html: `
                <form id="editcatForm" action="${urlRoot}/CategorieController/edit" method="POST">
                    <label for="catName">Categorie Name:</label>
                    <input id="catName" class="swal2-input" type="text" value="${catName}" name="name" required>
                    <p id="cateditError" class="text-red-500 text-sm mt-2"></p>
                    <input type="hidden" name="catId" value="${catId}">
                </form>
            `,
            showCancelButton: true,
            confirmButtonText: 'Update',
            cancelButtonText: 'Cancel',
            preConfirm: () => {
                const form = document.getElementById('editcatForm');
                const formData = new FormData(form);
                const cateditError = document.getElementById('cateditError');

                if (!formData.get('name')) {
                    cateditError.textContent = 'categorie name is required';
                    return false;
                } else {
                    cateditError.textContent = '';
                }

                return fetch(form.action, {
                    method: 'POST',
                    body: formData,
                })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error(`HTTP error! Status: ${response.status}`);
                        }
                        return response.json();
                    })
                    .catch(error => {
                        console.error('Fetch error:', error);
                    });
            },
        }).then(result => {
            if (result.value && result.value.success) {
                console.log(result.value.data);

            }
        });
    }

    ////////////////////////////delete tag /////////////////////////////////

    document.querySelectorAll('.delete-btn-cat').forEach(function (button) {
        button.addEventListener('click', function () {
            const CatId = button.getAttribute('data-cat-id');
            showDeleteCatPopup(CatId);
        });
    });

    function showDeleteCatPopup(CatId) {
        Swal.fire({
            title: 'Delete Categorie',
            text: 'Are you sure you want to delete this Categorie?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Delete',
            cancelButtonText: 'Cancel',
        }).then((result) => {
            if (result.isConfirmed) {

                deleteCat(CatId);
            }
        });
    }


    function deleteCat(CatId) {
        const url = `${urlRoot}/CategorieController/delete`;

        fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `CatId=${CatId}`,
        })
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! Status: ${response.status}`);
                }
                return response.json();
            })
            .then(data => {
                // Handle the response data or perform additional actions
                console.log(data);
            })
            .catch(error => {
                // Handle errors
                console.error('Fetch error:', error);
            });
    }




});