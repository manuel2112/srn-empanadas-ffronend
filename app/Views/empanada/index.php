<?= $this->extend('default') ?>

<?= $this->section('content') ?>
<main class="content">
    <div class="container-fluid p-0">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Empanadas</li>
            </ol>
        </nav>
        <div class="d-flex justify-content-between mb-2">
            <h1 class="h3 mb-3">Empanadas </h1>
        </div>

        <table class="table table-striped table-dark">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Relleno</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody id="dataTableBody">
                <!-- <tr>
                    <th scope="row">xxx</th>
                    <td>xxx</td>
                    <td>xxx</td>
                    <td>xxx</td>
                    <td>xxx</td>
                </tr> -->
            </tbody>
        </table>
    </div>
</main>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
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
                td7.innerHTML = '<div class="btn-group"><button class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></button> <button class="btn btn-danger"><i class="fa-solid fa-trash"></i></button></div>';
                tr.appendChild(td7);

                tableBody.appendChild(tr);
            });
        } catch (error) {
            console.error(error.message);
        }
    }
    getList()
</script>
<?= $this->endSection() ?>