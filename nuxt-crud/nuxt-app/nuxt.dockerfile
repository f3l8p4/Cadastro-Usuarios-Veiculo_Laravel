FROM node:14.17.1-alpine

RUN npm create nuxt-app @nuxt-app

CMD [ "npm", "start" ]