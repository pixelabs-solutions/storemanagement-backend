<form action="" class="card-body">
    <!-- header -->
    <div class="row gx-3">
        <div class="col-md-6 mb-3">
            <label for="example-text-input" class=" fw-bold form-label"
                data-i18n="popoups.future_managment.add_new_feature.color_select_atr">The attribute name</label>
            <input type="text" class="form-control rounded-3 p-3 fw-bold" id="sms_edit_attribute_name"
                placeholder="Attribute Name">
        </div>
        <div class="col-md-6 mb-3">
            <label for="" class="form-label fw-bold" data-i18n="popoups.future_managment.add_new_feature.d_type">Display
                Type (Color/Image)</label>
            <div class="h-100">
                <select class="form-select form-select-md h-80 bg-transparent" id="sms_edit_attribute_select"
                    style="height: 66%;">
                    <option value="color">Color</option>
                    <option value="image">Image</option>
                    <option value="select">Size</option>
                </select>
            </div>
        </div>
        <input type="hidden" id="edit_attributes_id">
    </div>
    <!-- Adding terms to the feature -->
   

    <div class="text-center mt-2 p-2  ">
        <button type="button" class="btn btn-primary col-12 col-md-12 rounded-4 py-3"
            onclick="submit_edit_feature_Data()" id="feature_disbale"
            data-i18n="popoups.future_managment.edit_variation_in_product_managment.normal_product">Update+</button>
    </div>
</form>


<script>
    function editAttribute(element) {
    // Find the closest tr element
    const tr = element.closest('tr');

    // Retrieve the data from the tr element
    const attributeId = element.getAttribute('attribute-id');
    const name = tr.querySelector('td:nth-child(2)').innerText;
    const type = tr.querySelector('td:nth-child(3)').innerText;

    console.log('Attribute ID:', attributeId);
    console.log('Name:', name);
    console.log('Type:', type);


    
    // Call the function to open the modal and pass the data (this function should be defined elsewhere)
    openModal('sms_feature_managment_w_edit_modal');
    document.getElementById('sms_edit_attribute_name').value = name;
    document.getElementById('sms_edit_attribute_select').value = type;
    document.getElementById('edit_attributes_id').value = attributeId;

}
</script>


<script>

function submit_edit_feature_Data() {
    // Get form data
    const attributeName = document.getElementById('sms_edit_attribute_name').value;
    const attributeType = document.getElementById('sms_edit_attribute_select').value;
    const attributeId = document.getElementById('edit_attributes_id').value;

    // Prepare payload
    const payload = {
        name: attributeName,
        type: attributeType
    };

    // Send PUT request using fetch
    fetch(`/attributes/${attributeId}`, {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        },
        body: JSON.stringify(payload)
    })
    .then(response => {
        if (response.ok) {
            // If response is ok (status is in the range 200-299), parse the JSON
            return response;
        } else {
            // If response is not ok, throw an error to be caught in the catch block
            return response.text().then(text => { throw new Error(text); });
        }
    })
    .then(data => {
        // Handle success response
        console.log(data);
        alert('Attribute updated successfully!');
        location.reload()
    })
    .catch(error => {
        // Handle error response
        console.error('There was a problem with the fetch operation:', error);
        alert('Failed to update attribute.');
    });
}


</script>