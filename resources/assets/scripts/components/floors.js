export default class Floors {
  constructor() {
    this.select_building = document.getElementById('building');
    this.select_floor = document.getElementById('floor');
    this.wrapper = document.getElementById('floors-wrapper');
    this.loader = document.getElementById('floors-loader');
  }

  init() {
    this.select_building.addEventListener('change', () => {
      const id = this.select_building.value;
      this.updateFloorsSelect(id);
    })

    this.select_floor.addEventListener('change', () => {
      this.loadFloor();
    })
  }

  updateFloorsSelect(building_id) {
    const ajax_url = window.ajax_object.ajax_url;
    const submit_data = {'id': building_id};
    let that = this;

    jQuery.ajax({
      type: 'POST',
      url: ajax_url,
      data: {
        action: 'get_floors_select',
        budynek: submit_data,
      },
      success: function (output) {
        that.select_floor.innerHTML = '';
        that.select_floor.innerHTML = output;
        that.select_floor.disabled = false;
        that.loadFloor();
      },
      error: function (xhr, status, errorThrown) {
        console.log(errorThrown);
      },
    });
  }

  loadFloor() {
    this.loader.classList.add('active');
    let value = this.select_floor.value;
    const id = this.select_building.value;

    const ajax_url = window.ajax_object.ajax_url;
    const submit_data = {'value': value, 'id': id};
    let that = this;

    jQuery.ajax({
      type: 'POST',
      url: ajax_url,
      data: {
        action: 'get_floors_info',
        data: submit_data,
      },
      success: function (output) {
        that.wrapper.innerHTML = '';
        that.wrapper.innerHTML = output;
        that.loader.classList.remove('active');
      },
      error: function (xhr, status, errorThrown) {
        console.log(errorThrown);
      },
    });
  }

  getCurrentFloors() {
    const id = this.select_floor.value;
    alert(id);
  }
}
