const editBtns= document.querySelectorAll('.edit');
editBtns.forEach(button => {
    button.addEventListener("click",event=>{
       let tr = event.target.parentNode.parentNode;
    //    let sno = tr.getElementsByTagName("td")[0].innerText;
       let title = tr.getElementsByTagName("td")[1].innerText;
       let description = tr.getElementsByTagName("td")[2].innerText;
       editTitle.value = title;
       editDescription.value = description;
       editSNo.value = event.target.id;
       console.log(editSNo.value);
       console.log("edit button clicked!")
       $('#editModal').modal('toggle');
    });
});



const deleteBtn = document.querySelectorAll(".delete");
deleteBtn.forEach(element=>{
    element.addEventListener("click",e=>{
        let SNo = e.target.id;
        if(confirm("Are you sure, you want to delete this note?")){
            window.location = `/CRUD SQL/index.php?delete=${SNo}`;
        }
        else{
            console.log("No");
        }
    });
})
