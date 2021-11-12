import { Controller } from "stimulus";

export default class extends Controller {
  static targets = ["sidebar", "main"];

  connect(){
    window.addEventListener('resize', () => {
      this.sidebarTarget.className = 'sidebar'
      this.mainTarget.className = 'main'
    })
  }

  toggleSidebarVisibility = () => {
    if (window.innerWidth > 992){
      this.sidebarTarget.classList.toggle("sidebar--hide");
      this.mainTarget.classList.toggle("main--expand");
    } else {
      this.sidebarTarget.classList.toggle("sidebar--show");
      this.mainTarget.classList.toggle("main--move");
    }
  }

  rotateSidebarIcon = (e) => {
    const icon = e.currentTarget.querySelector('.sidebar-header__right-icon');
    icon.classList.toggle('sidebar-header__right-icon--active')
  }
}
