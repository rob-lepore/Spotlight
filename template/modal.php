<!-- Modal -->
<style>
    .album-cover {
        width: 10%;
        min-width: 80px;
        height: auto;
        margin-right: 0.5rem;
    }

    .modal-content {
        max-height: 80% !important;
    }

</style>

<div class="modal fade" id="selectionModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content p-0">
            <div class="modal-header" style="border-bottom: none;">
                <div class="form-floating w-100">
                    <input type="text" class="form-control" id="searchInput" placeholder="Search" search-type=<?php echo $templateParams["searchType"] ?>>
                    <label for="searchInput">Search...</label>
                </div>
            </div>
            <div class="modal-body pt-0">

                <section id="songsList">
                </section>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn secondary " data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script src="js/modalInteraction.js"></script>