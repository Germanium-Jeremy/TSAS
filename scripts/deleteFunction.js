function deleteRecord(id, table) {
  if (confirm("Are you sure you want to delete this record?")) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "../php/delete.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4) {
        if (xhr.status === 200) {
          if (xhr.responseText === "success") {
            alert("Record Deleted Successfully not Really");
            location.reload();
          } else {
            alert("Deleted the Record Successfully.");
            location.reload();
          }
        } else {
          console.error("Error: ", xhr.status, xhr.statusText);
        }
      }
    };
    xhr.onerror = function () {
      console.error("Network Error");
    };
    xhr.send("id=" + id + "&table=" + table);
  }
}