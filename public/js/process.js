    async function getList() {
        const url = "http://localhost:3000/api/empanadas/";
        try {
            const response = await fetch(url);
            if (!response.ok) {
                throw new Error(`Response status: ${response.status}`);
            }

            const data = await response.json();
            console.log(data);

            const tableBody = document.getElementById('dataTableBody');
            tableBody.innerHTML = ''; // Clear existing content

            data.forEach((row, idx) => {
                const tr = document.createElement('tr');

                const td1 = document.createElement('td');
                td1.textContent = ++idx;
                tr.appendChild(td1);

                const td2 = document.createElement('td');
                td2.textContent = row.name;
                tr.appendChild(td2);

                const td3 = document.createElement('td');
                td3.textContent = row.type;
                tr.appendChild(td3);

                const td4 = document.createElement('td');
                td4.textContent = `$${row.price}`;
                tr.appendChild(td4);

                const td5 = document.createElement('td');
                td5.textContent = row.filling;
                tr.appendChild(td5);

                const td6 = document.createElement('td');
                td6.textContent = `${row.is_sold_out ? 'Agotado' : 'Disponible'}`;
                tr.appendChild(td6);

                const td7 = document.createElement('td');
                td7.innerHTML = `<div class="btn-group"><button class="btn btn-warning" onclick="getData(${row.id})"><i class="fa-solid fa-pen-to-square"></i></button> <button class="btn btn-danger" onclick="deleteData(${row.id})"><i class="fa-solid fa-trash"></i></button></div>`;
                tr.appendChild(td7);

                tableBody.appendChild(tr);
            });
        } catch (error) {
            console.error(error.message);
        }
    }

    function storeData() {
        console.log("store")
    }

    async function deleteData(id) {
        console.log('remove data', id);
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: "btn btn-success",
                cancelButton: "btn btn-danger"
            },
            buttonsStyling: false
            });
            swalWithBootstrapButtons.fire({
            title: "¿Estás seguro?",
            text: "Esta información será eliminada.",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Eliminar",
            cancelButtonText: "Cancelar",
            reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    const url = `http://localhost:3000/api/empanadas/${id}`;
                    fetch(url, {
                            method: 'DELETE'
                        })
                        .then(response => {
                            if (!response.ok) {
                                throw new Error(`HTTP error! status: ${response.status}`);
                            }
                        })
                        .then(data => {
                            swalWithBootstrapButtons.fire({
                                title: "Información eliminada",
                                icon: "success"
                            });
                            getList(); // Refresh the list after deletion
                        })
                        .catch(error => {
                            console.error('There was a problem with the fetch operation:', error);
                        });
                }
            });
    }
    
    async function getData(id) {
        const url = `http://localhost:3000/api/empanadas/${id}`;
        try {
            const response = await fetch(url);
            if (!response.ok) {
                throw new Error(`Response status: ${response.status}`);
            }

            const data = await response.json();
            console.log(data);
        } catch (error) {
            console.error(error.message);
        }
    }
    