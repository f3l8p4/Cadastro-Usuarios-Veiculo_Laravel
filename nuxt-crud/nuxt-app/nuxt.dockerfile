# Stage 1 - build
FROM node:lts-alpine
RUN npm init nuxt-app
RUN npm run dev
CMD ["npm"]