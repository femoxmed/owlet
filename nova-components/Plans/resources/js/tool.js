Nova.booting((Vue, router, store) => {
  router.addRoutes([
    {
      name: 'plans-create',
      path: '/plans/create',
      component: require('./components/Tool'),
    },
    {
      name: 'plans',
      path: '/plans',
      component: require('./components/Table'),
    },

   
  ])
})
