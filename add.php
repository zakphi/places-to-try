<?php require_once 'header.php'; ?>
  <body>
    <div class="container-fluid">
      <?php require_once 'nav.php'; ?>
      <form id="add_location" method="post">
        <div class="form-group">
          <label>Name
            <input type="text" name="name" class="form-control">
          </label>
        </div>
        <div class="form-group">
          <label>Address
            <input type="text" name="address" class="form-control">
          </label>
        </div>
        <div class="form-group">
          <label>City
            <input type="text" name="city" class="form-control">
          </label>
        </div>
        <div class="form-group">
          <label>State
            <select name="state" class="form-control">
              <option></option>
              <option value="AL">Alabama</option>
              <option value="AK">Alaska</option>
              <option value="AZ">Arizona</option>
              <option value="AR">Arkansas</option>
              <option value="CA">California</option>
              <option value="CO">Colorado</option>
              <option value="CT">Connecticut</option>
              <option value="DE">Delaware</option>
              <option value="DC">District Of Columbia</option>
              <option value="FL">Florida</option>
              <option value="GA">Georgia</option>
              <option value="HI">Hawaii</option>
              <option value="ID">Idaho</option>
              <option value="IL">Illinois</option>
              <option value="IN">Indiana</option>
              <option value="IA">Iowa</option>
              <option value="KS">Kansas</option>
              <option value="KY">Kentucky</option>
              <option value="LA">Louisiana</option>
              <option value="ME">Maine</option>
              <option value="MD">Maryland</option>
              <option value="MA">Massachusetts</option>
              <option value="MI">Michigan</option>
              <option value="MN">Minnesota</option>
              <option value="MS">Mississippi</option>
              <option value="MO">Missouri</option>
              <option value="MT">Montana</option>
              <option value="NE">Nebraska</option>
              <option value="NV">Nevada</option>
              <option value="NH">New Hampshire</option>
              <option value="NJ">New Jersey</option>
              <option value="NM">New Mexico</option>
              <option value="NY">New York</option>
              <option value="NC">North Carolina</option>
              <option value="ND">North Dakota</option>
              <option value="OH">Ohio</option>
              <option value="OK">Oklahoma</option>
              <option value="OR">Oregon</option>
              <option value="PA">Pennsylvania</option>
              <option value="RI">Rhode Island</option>
              <option value="SC">South Carolina</option>
              <option value="SD">South Dakota</option>
              <option value="TN">Tennessee</option>
              <option value="TX">Texas</option>
              <option value="UT">Utah</option>
              <option value="VT">Vermont</option>
              <option value="VA">Virginia</option>
              <option value="WA">Washington</option>
              <option value="WV">West Virginia</option>
              <option value="WI">Wisconsin</option>
              <option value="WY">Wyoming</option>
            </select>
          </label>
        </div>
        <div class="form-group">
          <label>Zip
            <input type="text" name="zip" class="form-control">
          </label>
        </div>
        <input type="submit" id="add" value="Add Another">
        <!-- <button id="add">Add Another</button> -->
        <input type="button" id="done" value="Save and Finish">
        <!-- <a href="#" id="add">Add Another</a> -->
        <!-- <a href="#" id="done">Save and Finish</a> -->
      </form>

      <div id="added"></div>
    </div>
<?php require_once 'footer.php'; ?>