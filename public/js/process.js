    

    function formatMoneyString(value){
        if (!value) return;
        const formatValue = Number(value.split(".")[0]);
        const newString = formatValue > 0 ? Number(value.split(".")[0]) : "$0";

        return new Intl.NumberFormat('de-DE').format(newString);
    };

    async function getList() {
        const url = "http://localhost:3000/api/empanadas/";
        try {
            const response = await fetch(url);
            if (!response.ok) {
                throw new Error(`Response status: ${response.status}`);
            }

            const data = await response.json();

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
                td4.textContent = `$${formatMoneyString(row.price)}`;
                tr.appendChild(td4);

                const td5 = document.createElement('td');
                td5.textContent = row.filling;
                tr.appendChild(td5);

                const td6 = document.createElement('td');
                td6.textContent = `${row.is_sold_out ? 'Agotado' : 'Disponible'}`;
                tr.appendChild(td6);

                const td7 = document.createElement('td');
                td7.innerHTML = `<div class="btn-group"><button class="btn btn-warning" onclick="getData(${row.id})" data-bs-toggle="modal" data-bs-target="#updateEmpanadaModal"><i class="fa-solid fa-pen-to-square"></i></button> <button class="btn btn-danger" onclick="deleteData(${row.id})"><i class="fa-solid fa-trash"></i></button></div>`;
                tr.appendChild(td7);

                tableBody.appendChild(tr);
            });
        } catch (error) {
            console.error(error.message);
        }
    }

    async function storeData() {
        
        const form = document.getElementById('storeForm');
        const name = document.getElementById('nameForm');
        const type = document.getElementById('typeForm');
        const price = document.getElementById('priceForm');
        const filling = document.getElementById('fillingForm');

        let isValid = true;
        
        nameFormError.textContent = '';
        typeFormError.textContent = '';
        priceFormError.textContent = '';
        fillingFormError.textContent = '';
        
        if (name.value.length < 3) {
            nameFormError.textContent = 'Nombre superior a 3 caracteres.';
            isValid = false;
        }
        if (type.value.length < 3) {
            typeFormError.textContent = 'Tipo superior a 3 caracteres.';
            isValid = false;
        }
        if (Number(price.value) <= 0) {
            priceFormError.textContent = 'Precio debe ser mayor a cero.';
            isValid = false;
        }
        if (filling.value.length < 10) {
            fillingFormError.textContent = 'Relleno debe ser mayor a 10 caracteres.';
            isValid = false;
        }

        if (isValid) {
            console.log("pasa")
            const storeData = {
                name: name.value,
                type: type.value,
                price: Number(price.value),
                filling: filling.value,
                is_sold_out: false
            };
            const response = await fetch('http://localhost:3000/api/empanadas', {
                method: 'POST',
                body: JSON.stringify(storeData), 
                headers: { 'Content-Type': 'application/json' }
            });

            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }

            const result = await response.json();
            console.log('Success:', result);
            document.getElementById("close-modal-store").click();
            form.reset();
            Swal.fire("Empanada guardada", "La empanada ha sido guardada exitosamente.", "success");
            getList();
        }
    }

    async function deleteData(id) {
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
            document.getElementById('idUpdateForm').value = data[0].id;
            document.getElementById('nameUpdateForm').value = data[0].name;
            document.getElementById('typeUpdateForm').value = data[0].type;
            document.getElementById('priceUpdateForm').value = data[0].price.split(".")[0];
            document.getElementById('fillingUpdateForm').value = data[0].filling;

            const radioToSelect = data[0].is_sold_out ? document.getElementById("danger-outlined") : document.getElementById("success-outlined");
            if (radioToSelect) {
                radioToSelect.checked = true;
            }
        } catch (error) {
            console.error(error.message);
        }
    }
    
    async function updateData() {
        
        const form = document.getElementById('updateForm');
        const id = document.getElementById('idUpdateForm').value;
        const name = document.getElementById('nameUpdateForm');
        const type = document.getElementById('typeUpdateForm');
        const price = document.getElementById('priceUpdateForm');
        const filling = document.getElementById('fillingUpdateForm');
        const isSoldOut = document.querySelector('input[name="options-outlined"]:checked').value === 'false' ? false : true;

        let isValid = true;
        
        nameUpdateFormError.textContent = '';
        typeUpdateFormError.textContent = '';
        priceUpdateFormError.textContent = '';
        fillingUpdateFormError.textContent = '';
        
        if (name.value.length < 3) {
            nameUpdateFormError.textContent = 'Nombre superior a 3 caracteres.';
            isValid = false;
        }
        if (type.value.length < 3) {
            typeUpdateFormError.textContent = 'Tipo superior a 3 caracteres.';
            isValid = false;
        }
        if (Number(price.value) <= 0) {
            priceUpdateFormError.textContent = 'Precio debe ser mayor a cero.';
            isValid = false;
        }
        if (filling.value.length < 10) {
            fillingUpdateFormError.textContent = 'Relleno debe ser mayor a 10 caracteres.';
            isValid = false;
        }

        if (isValid) {
            const updateData = {
                name: name.value,
                type: type.value,
                price: Number(price.value),
                filling: filling.value,
                is_sold_out: isSoldOut
            };
            const response = await fetch(`http://localhost:3000/api/empanadas/${id}`, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(updateData)
            });

            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }

            const result = await response.json();
            console.log('Success:', result);
            document.getElementById("close-modal-update").click();
            form.reset();
            Swal.fire("Empanada actualizada", "La empanada ha sido actualizada exitosamente.", "success");
            getList();
        }
    }
    