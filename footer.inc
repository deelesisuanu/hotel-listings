<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-side modal-top-right">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Fill User Details</h5>
        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="form-outline">
            <input type="text" id="fullName" class="form-control" />
            <label class="form-label" for="fullName">Enter FullName</label>
        </div>
        <br/>
        <div class="form-outline">
            <input type="email" id="emailAddress" class="form-control" />
            <label class="form-label" for="emailAddress">Enter Email Address</label>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="saveBook();">Save &amp; Book</button>
      </div>
    </div>
  </div>
</div>

<!-- MDB -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.js"></script>
<script src="app.js"></script>

</body>

</html>