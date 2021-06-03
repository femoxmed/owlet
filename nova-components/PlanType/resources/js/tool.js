Nova.booting((Vue, router, store) => {
  router.addRoutes([
    {
      name: 'plan-type',
      path: '/plan-type',
      component: require('./components/Tool'),
    },
  ])
})
