window.onload = function(){
    const sortForm = document.getElementById("sort_team");
    const allDivisionsTd = document.querySelectorAll("td"); 
    
    const selecti = document.getElementById('division-select');
    
        let allDivisions = [];
        for (const i of  allDivisionsTd) {
            if(i.className != ''){
                allDivisions.push(i.className);
            }
        }

        singleDivision = allDivisions.filter(function(item, pos) {
            return allDivisions.indexOf(item) == pos; 
        })
    
        function populateOptions(){
            let divisionOptions = singleDivision.map(division => `<option value=${division}>${division.charAt(0).toUpperCase() + division.slice(1)}</option>`).join('\n');
            return divisionOptions;
        }
        
    
        function formRender(){
            
            postContent = `
                    <div class="row">
                    <div class="col col-6 d-flex justify-content-center"> 
                        <h6>Sort by division</h6>
                        </div> 
                        <div class="col col-6 align-self-center"> 
                                <select id="division-select" aria-label="Select by division">
                                <option select>Select Division</option>
                                    ${populateOptions()}
                                    <option>All</option>
                                    </select>
                                
                                </div> 
                        </div> 
                            `;
                        
            return sortForm.innerHTML = postContent;
        
        }

        function update() {
        
            document.getElementById('division-select').addEventListener('change', function() {
                var cells = document.querySelectorAll("tr");
                    var len = cells.length;
                    for (var i=0; i<len; i++) {
                        
                        if (cells[i].id != this.value && cells[i].id != "header" ){
                            cells[i].style.display = 'none';
                        }else{
                            cells[i].style.display = 'table-row';
                        }

                        if(this.value == "All" || this.value == "Select Division"){
                            cells[i].style.display = 'table-row';
                        }
                        
                    }
            });
       
    }

formRender();
update();
}
