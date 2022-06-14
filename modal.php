<script>
  function onDelete() {
    let confirmation = document.getElementById("confirmation");
    if (!confirmation.classList.contains("modal-open")) {
      confirmation.classList.add("modal-open");
    }
  }

  function onCancel() {
    let confirmation = document.getElementById("confirmation");
    confirmation.classList.remove("modal-open");
  }

  function onConfirm() {
    onCancel();
  }

  document.addEventListener("DOMContentLoaded", () => {
    document
      .getElementById("confirmation")
      .addEventListener("click", onCancel);
    document
      .querySelector(".modal")
      .addEventListener("click", (e) => e.stopPropagation());
  });
</script>
<script>
  $(document).ready(function() {

    $('.deletebtn').on('click', function() {



      $tr = $(this).closest('tr');

      var data = $tr.children("td").map(function() {
        return $(this).text();
      }).get();

      console.log(data);

      $('#delete_id').val(data[0]);

    });
  });
</script>