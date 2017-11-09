import Sidebar from './SideBar.vue'

const SidebarStore = {
  showSidebar: false,
  sidebarLinks: [
    {
      name: 'Dashboard',
      icon: 'ti-panel',
      path: '/admin/dashboard'
    },
    {
      name: 'Clientes',
      icon: 'ti-user',
      path: '/admin/clientes'
    },
    {
      name: 'Reservas',
      icon: 'ti-timer',
      path: '/admin/reservas'
    },
    {
      name: 'Relatórios',
      icon: 'ti-stats-up',
      path: '/admin/relatorios'
    },
    {
      name: 'Sair',
      icon: 'ti-power-off',
      path: '/admin/sair'
    }
  ],
  displaySidebar (value) {
    this.showSidebar = value
  }
}

const SidebarPlugin = {

  install (Vue) {
    Vue.mixin({
      data () {
        return {
          sidebarStore: SidebarStore
        }
      }
    })

    Object.defineProperty(Vue.prototype, '$sidebar', {
      get () {
        return this.$root.sidebarStore
      }
    })
    Vue.component('side-bar', Sidebar)
  }
}

export default SidebarPlugin