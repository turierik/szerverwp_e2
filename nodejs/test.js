const { User, Post } = require('./models')
const { Op } = require('sequelize')

const niceLog = (data) => console.log(JSON.parse(JSON.stringify(data, null, 2)))

;(async () =>{
    const posts = await Post.findAll()
    // niceLog(posts)

    const postsOrdered = await Post.findAll({
        order: [ ['title', 'ASC'], ['content', 'DESC'] ]
    })
    // niceLog(postsOrdered)

    const postsBy4 = await Post.findAll({
        where: {
            authorId: 4
        }
    })
    // niceLog(postsBy4)

    const postsIdOver10 = await Post.findAll({
        where: {
            id: {
                [Op.gt]: 10
            }
        }
    })
    // niceLog(postsIdOver10)

    const postsBetween10and15 = await Post.findAll({
        where: {
            id: {
                [Op.gt]: 10,
                [Op.lt]: 15,
            },
            title: {
                [Op.like]: '%'
            }
        }
    })
    // niceLog(postsBetween10and15)

    const postsOr = await Post.findAll({
        where: {
            id: {
                [Op.or]: {
                    [Op.lt]: 10,
                    [Op.gt]: 15,
                }
            },
        }
    })
    // niceLog(postsOr)

    const postsGroup = await Post.count({
        group: ['authorId']
    })
    // niceLog(postsGroup)

    const user4 = await User.findByPk(4)
    const theirPosts = await user4.getPosts()
    niceLog(theirPosts)
})()