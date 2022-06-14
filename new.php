<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Vanilla confirmation modal</title>
  </head>
  <style>
    .body {
      height: 300px;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    #delete {
      font-size: large;
      padding: 0.5em 1em;
    }

    .modal-container {
      z-index: 9999;
      position: fixed;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      display: none;
      align-items: center;
      justify-content: center;
    }

    .modal-open {
      display: flex;
    }

    .modal {
      max-width: 700px;
      max-height: 400px;
      background-color: white;
      border-radius: 3px;
    }

    .modal-button {
      text-transform: uppercase;
      padding: 0.5em 1em;
      border: none;
      color: #fff;
      background-color: rgba(0, 0, 0, 0.5);
      border-radius: 3px;
      margin-left: 0.5em;
    }

    .modal-confirm-button {
      background-color: tomato;
    }

    .modal-header {
      background-color: rgba(0, 0, 0, 0.1);
      display: flex;
      flex-direction: column;
    }

    .modal-header h2 {
      margin: 1em;
    }

    .modal-header span {
      padding-right: 0.3em;
      cursor: default;
      align-self: flex-end;
    }

    .modal-content {
      padding: 1em;
      flex-grow: 1;
    }

    .modal-footer {
      padding: 1em;
      background-color: rgba(0, 0, 0, 0.05);
      display: flex;
      justify-content: flex-end;
    }

    .close-button {
      border: none;
      text-align: center;
      cursor: pointer;
      white-space: nowrap;
    }
  </style>
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
  <body class="body">
    <button id="delete" name="delete" onclick="onDelete()">Delete</button>
    <div id="confirmation" class="modal-container">
      <div class="modal">
        <section>
          <header class="modal-header">
            <span onclick="onCancel()">&times;</span>
            <h2>Are you sure you want to delete?</h2>
          </header>
          <section class="modal-content">
            <p>This action cannot be undone</p>
          </section>
          <footer class="modal-footer">
            <button class="modal-button" onclick="onCancel()">Cancel</button>
            <button
              class="modal-button modal-confirm-button"
              onclick="onConfirm()"
            >
              Confirm
            </button>
          </footer>
        </section>
      </div>
    </div>
  </body>
</html>