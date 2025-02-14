

<div class="form-container rounded">
<div class=" mt-4">
        <h2>Social Media CRUD (AJAX)</h2>

        <!-- Add Button -->
        <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#socialMediaModal">Add Social Media</button>

        <!-- Social Media Table -->
        <table class="table table-bordered w-100"  id="social-media-table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Icon</th>
                    <th>Name</th>
                    <th>Link</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>

        <!-- Modal -->
        <div class="modal fade" id="socialMediaModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Social Media</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="social-id">
                        <input type="text" id="social-icon" class="form-control mb-2" placeholder="FontAwesome Icon">
                        <input type="text" id="social-name" class="form-control mb-2" placeholder="Name">
                        <input type="text" id="social-link" class="form-control mb-2" placeholder="URL">
                        <button class="btn btn-primary" id="save-social">Save</button>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
