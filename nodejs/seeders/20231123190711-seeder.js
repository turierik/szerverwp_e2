'use strict';
const { User, Post } = require('../models')
const { faker } = require('@faker-js/faker')
/** @type {import('sequelize-cli').Migration} */
module.exports = {
  async up (queryInterface, Sequelize) {
    /**
     * Add seed commands here.
     *
     * Example:
     * await queryInterface.bulkInsert('People', [{
     *   name: 'John Doe',
     *   isBetaMember: false
     * }], {});
    */
   let users = []
   for (let i = 0; i < 10; i++){
    users.push({
      email: faker.internet.email(),
      password: faker.internet.password()
    })
   }
   users = await User.bulkCreate(users)

   const posts = []
   for (let i = 0; i < 30; i++){
    posts.push({
      title: faker.lorem.sentence(),
      content: faker.lorem.text(),
      authorId: faker.helpers.arrayElement(users).id
    })
   }
   await Post.bulkCreate(posts)
  },

  async down (queryInterface, Sequelize) {
    /**
     * Add commands to revert seed here.
     *
     * Example:
     * await queryInterface.bulkDelete('People', null, {});
     */
  }
};
