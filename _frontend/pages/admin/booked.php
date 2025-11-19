<?=include_page('header')?>
<?=include_page('sidebar')?>
<div class="content">
            <!-- Navbar Start -->
                    
            

        <?=include_page('navbar')?>
        

        <!-- MODALS (Add, Edit, Delete) - Keep your existing modal HTML here -->
        <!-- Add Modal -->

        <!-- End Modals -->




        </div>
<?=include_page('footer')?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTFyMGUHvMMqEYp" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-I7E8VVD/ismYTFyMGUHvMMqEYp" crossorigin="anonymous"></script>

<?= import_packages("datatable", "tyrax", "loading", "ctr", "path", "twal") ?>

    <script>
        addEventListener("DOMContentLoaded", () => {
            LOADING.load(true);

            setTimeout(() => LOADING.load(false), 1000)

        })
    </script>
