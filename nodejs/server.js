// CommonJs
const { User, Post } = require('./models')
const fastify = require('fastify')({
  logger: true
})

fastify.get('/posts', async (request, reply) => {
  const posts = await Post.findAll()
  reply.send(posts)
})

fastify.get('/posts/:id', async (request, reply) => {
    // paraméterek: request.params
    const p = await Post.findByPk(request.params.id)
    if (p === null)
        return reply.status(404).send("NOT FOUND")
    reply.send(p)
  })

  fastify.post('/posts', async (request, reply) => {
    // body: request.body
    const p = await Post.create(request.body)
    reply.status(201).send(p)
  })

  fastify.patch('/posts/:id', async (request, reply) => {
    const p = await Post.findByPk(request.params.id)
    if (p === null)
        return reply.status(404).send("NOT FOUND")
    else {
        await p.update(request.body)
        reply.send(p)
    }
  })

  fastify.delete('/posts/:id', async (request, reply) => {
    // paraméterek: request.params
    const p = await Post.findByPk(request.params.id)
    if (p === null)
        return reply.status(404).send("NOT FOUND")
    else {
        await p.destroy()
        return reply.send("DELETED")
    }
  })

fastify.listen({ port: 3000 }, (err, address) => {
  if (err) throw err
  // Server is now listening on ${address}
})